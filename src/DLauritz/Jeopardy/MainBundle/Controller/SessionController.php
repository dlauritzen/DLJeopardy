<?php

namespace DLauritz\Jeopardy\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SessionController extends Controller {
	
	private function getCurrentUser() {
		return $this->get('security.context')->getToken()->getUser();
	}
	
	private function isAnonymous($user) {
		return $user === "anon.";
	}
	
	// Result of entering a game hash in the home page form
	public function searchAction() {
		$request = $this->getRequest();
		$hash = $request->get('hash');
		
		$session = $this->getDoctrine()->getRepository('DLauritzJeopardyMainBundle:Session')->findOneByHash($hash);
		
		if (!$session) {
			$this->get('session')->setFlash('error', "Sorry, but we couldn't find a game with that hash.");
			return $this->redirect($this->generateUrl('home'));
		} else {
			return $this->redirect($this->generateUrl('play_session', array('session_hash' => $hash)));
		}
	}
	
	public function setStatusAction($session_id, $board, $column, $question) {
		$user = $this->getCurrentUser();
		
		if (!$this->isAnonymous($user)) {
			$session = $this->getDoctrine()->getRepository('DLauritzJeopardyMainBundle:Session')->find($session_id);
			if ($session) {
				$moderator = $user->getId() === $session->getModerator()->getId();
				if ($moderator) {
					// Permission granted!
					$session->setGameStage($board);
					$session->setCurrentColumn($column);
					$session->setCurrentQuestion($question);
					
					$em = $this->getDoctrine()->getEntityManager();
					$em->persist($session);
					$em->flush();
					
					return $this->redirect($this->generateUrl('play_session', array('session_hash' => $session->getHash())));
				}
			}
		}
		
		return $this->redirect($this->generateUrl('home'));
	}
	
	private function getPlayerStatus($game_session) {
		// Get whether they're a "registered" player. If not, a button will let them join the game
		$web_session = $this->get('session');
		$em = $this->getDoctrine()->getEntityManager();
		$query = $em->createQuery('SELECT p FROM DLauritzJeopardyMainBundle:Player p WHERE p.session = :session AND p.web_session = :web')
		->setParameters(array('session' => $game_session->getId(),
				'web' => $web_session->getId()));
		try {
			$player = $query->getSingleResult();
			// Single result means they've already joined.
			$canJoin = false;
		} catch (\Doctrine\ORM\NoResultException $none) {
			// This just means they haven't joined the game
			$canJoin = true;
			$player = null;
		} catch (\Doctrine\ORM\NonUniqueResultException $toomany) {
			// This is an issue. They shouldn't be able to join a game more than once
			$this->get('session')->setFlash('error', "Hmm.. Something went wrong. Your session id is \""
					. $web_session->getId() . "\" and this game session's id is " . $game_session->getId() . ". Please "
					. "send this information to the webmaster (webmaster@dallinlauritzen.com).");
			$canJoin = false;
			$player = null;
		}
		
		return array($canJoin, $player);
	}
	
	public function playAction($session_hash, $_format) {
		$game_session = $this->getDoctrine()->getRepository('DLauritzJeopardyMainBundle:Session')->findOneByHash($session_hash);
		
		if (!$game_session) {
			$this->get('session')->setFlash('error', "No game with that key was found.");
			return $this->redirect($this->generateUrl('home'));
		}
		
		list($canJoin, $player) = $this->getPlayerStatus($game_session);
		
		return $this->render('DLauritzJeopardyMainBundle:Session:play.'.$_format.'.twig',
				array('session' => $game_session, 'canJoin' => $canJoin, 'player' => $player));
	}
	
	public function statusAction($id, $_format) {
		$session = $this->getDoctrine()->getRepository('DLauritzJeopardyMainBundle:Session')->find($id);
		
		if (!$session) {
			$this->get('session')->setFlash('error', "No game with that key was found.");
			return $this->redirect($this->generateUrl('home'));
		}
		
		$moderator = false;
		if ($this->get('security.context')->isGranted('ROLE_USER')) {
			$moderator = $this->get('security.context')->getToken()->getUser()->getId() == $session->getModerator()->getId();
		}
		
		list($canJoin, $player) = $this->getPlayerStatus($session);
		
		return $this->render('DLauritzJeopardyMainBundle:Session:status.'.$_format.'.twig',
				array('session' => $session, 'moderator' => $moderator, 'canJoin' => $canJoin, 'player' => $player));
	}
	
}
