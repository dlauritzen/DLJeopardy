<?php

namespace DLauritz\Jeopardy\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayersController extends Controller {
	
	private function getCurrentUser() {
		return $this->get('security.context')->getToken()->getUser();
	}
	
	private function isAnonymous($user) {
		return $user === "anon.";
	}
	
	public function failAction($session_id, $board, $column, $question) {
		$session = $this->getDoctrine()->getRepository('DLauritzJeopardyMainBundle:Session')->find($session_id);
		$user = $this->getCurrentUser();
		
		if ($user !== "anon." && $user->getId() === $session->getModerator()->getId()) {
			// moderator, allowed
			$move = new \DLauritz\Jeopardy\MainBundle\Entity\Move();
			//$move->setPlayer(null); // it don't like this, but leaving it alone makes it null, so we don't care
			$move->setSession($session);
			$move->setBoard($session->getGameStage());
			$move->setColumn($session->getCurrentColumn());
			$move->setQuestion($session->getCurrentQuestion());
			$move->setCorrect(false);
			$move->setAnswer(null);
			
			$em = $this->getDoctrine()->getEntityManager();
			$em->persist($move);
			$em->flush();
			
			return $this->render('::success.json.twig', array('success' => true));
		}
		
		return $this->render('::success.json.twig', array('success' => false));
	}
	
	public function answerAction($id, $type) {
		$player = $this->getDoctrine()->getRepository('DLauritzJeopardyMainBundle:Player')->find($id);
		
		if ($player) {
			$session = $player->getSession();
			$user = $this->getCurrentUser();
			$moderator = !$this->isAnonymous($user) && $user->getId() === $session->getModerator()->getId();
			
			if ($moderator) {
				// we know $type is either "yes", "no", or "edit"
				$move = new \DLauritz\Jeopardy\MainBundle\Entity\Move();
				$move->setPlayer($player);
				$move->setSession($session);
				$move->setBoard($session->getGameStage());
				$move->setColumn($session->getCurrentColumn());
				$move->setQuestion($session->getCurrentQuestion());
				$move->setCorrect($type === "yes");
				
				if ($type === "edit") {
					$move->setAnswer($this->getRequest()->get('answer'));
				} else {
					$move->setAnswer(null);
				}
				
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($move);
				$em->flush();
				
				return $this->render('::success.json.twig', array('success' => true));
				//return $this->render('DLauritzJeopardyMainBundle:Session:play.html.twig',
				//	array('session' => $session, 'moderator' => $moderator, 'canJoin' => false, 'player' => null));
			}
		}
		
		// if not moderator, bad page - go home
		//return $this->redirect($this->generateUrl('home'));
		return $this->render('::success.json.twig', array('success' => false));
	}
	
	public function listAction($session_id, $_format) {
		$user = $this->getCurrentUser();
		
		if ($this->isAnonymous($user)) {
			$session = null; // not logged in, obviously not moderator
		} else {
			$session = $this->getDoctrine()->getRepository('DLauritzJeopardyMainBundle:Session')->find($session_id);
			if (!$session || $user->getId() != $session->getModerator()->getId()) {
				// Either bad session id or
				// logged in, but not moderator
				$session = null;
			}
		}
		
		return $this->render('DLauritzJeopardyMainBundle:Players:list.'.$_format.'.twig',
				array('session' => $session));
	}
	
	public function joinGameAction($session_id) {
		$webSession = $this->get('session')->getId();
		$request = $this->getRequest();
	
		$session = $this->getDoctrine()->getRepository('DLauritzJeopardyMainBundle:Session')->find($session_id);
		if (!$session) {
			$this->get('session')->setFlash('error', "No game session with that id.");
			return $this->redirect($this->generateUrl('home'));
		}
	
		$player = new \DLauritz\Jeopardy\MainBundle\Entity\Player();
		$player->setSession($session);
		$player->setWebSession($webSession);
		$form = $this->createFormBuilder($player)->add('name', 'text')->getForm();
	
		if ($request->getMethod() == "POST") {
			// form submitted
			$form->bindRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($player);
				$em->flush();
	
				return $this->redirect($this->generateUrl('play_session', array('session_hash' => $session->getHash())));
			}
		}
	
		// Else (or if validation failed) show the join game form
		return $this->render('DLauritzJeopardyMainBundle:Session:join.html.twig',
				array('session' => $session, 'form' => $form->createView()));
	}
	
	public function exitAction($id, $action) {
		$player = $this->getDoctrine()->getRepository('DLauritzJeopardyMainBundle:Player')->find($id);
		$user = $this->getCurrentUser();
		$webSession = $this->get('session');
		$gameSession = $player->getSession();
		$moderator = $user != "anon." && $user->getId() == $gameSession->getModerator()->getId();
		$em = $this->getDoctrine()->getEntityManager();
		
		if ($action == "exit") {
			// Leaving
			if ($player->getWebSession() !== $webSession->getId()) {
				// Someone is trying to "exit" a different player, naughty
				$this->get('session')->setFlash('warning', "You aren't allowed to boot other players.");
			} else {
				// Player leaving, allowed
				$em->remove($player);
				$em->flush();
			}
		} else {
			// Booting
			if ($moderator) {
				// booting as moderator, allowed
				$em->remove($player);
				$em->flush();
			} else {
				// Booting when not moderator. Naughty.
				$this->get('session')->setFlash('warning', "You aren't allowed to boot other players.");
			}
		}
		return $this->render($this->generateUrl('home'));
	}
	
}
