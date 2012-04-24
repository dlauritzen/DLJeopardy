<?php
namespace DLauritz\Jeopardy\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BoardController extends Controller {
	
	public function detailAction($id, $_format) {
		$board = $this->getDoctrine()->getRepository('DLauritzJeopardyGameBundle:Board')->find($id);
		if (!$board) {
			$this->get('session')->setFlash('error', "Couldn't find board " . $id);
			return $this->redirect($this->generateUrl('home'));
		}
		
		return $this->render('DLauritzJeopardyGameBundle:Board:detail.'.$_format.'.twig',
				array('board' => $board,
						'hide_navbar' => true));
	}
	
}
