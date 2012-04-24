<?php
namespace DLauritz\Jeopardy\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller {
	
	public function detailAction($id, $_format) {
		$game = $this->getDoctrine()->getRepository('DLauritzJeopardyGameBundle:Game')->find($id);
		if (!$game) {
			$this->get('session')->setFlash('error', "Couldn't find game " . $id);
			return $this->redirect($this->generateUrl('home'));
		}
		
		return $this->render('DLauritzJeopardyGameBundle:Game:detail.'.$_format.'.twig',
				array('game' => $game));
	}
	
}
