<?php
namespace DLauritz\Jeopardy\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ColumnController extends Controller {
	
	public function detailAction($id, $_format) {
		$column = $this->getDoctrine()->getRepository('DLauritzJeopardyGameBundle:Column')->find($id);
		if (!$column) {
			$this->get('session')->setFlash('error', "Couldn't find column " . $id);
			return $this->redirect($this->generateUrl('home'));
		}
		
		return $this->render('DLauritzJeopardyGameBundle:Column:detail.'.$_format.'.twig',
				array('column' => $column));
	}
	
}
