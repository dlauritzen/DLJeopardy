<?php
namespace DLauritz\Jeopardy\MainBundle\Controller;

use DLauritz\Jeopardy\MainBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {

	// Show the login form
	public function loginAction() {
		$request = $this->getRequest();
		$session = $request->getSession();
		
		$user = new User();
		$form = $this->createFormBuilder($user)->getForm();
		
		if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		} else {
			$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
			$session->remove(SecurityContext::AUTHENTICATION_ERROR);
		}
		
		return $this->render('DLauritzJeopardyMainBundle:User:login.html.twig',array(
				'last_email' => $session->get(SecurityContext::LAST_USERNAME),
				'error' => $error,
				'form' => $form->createView()));
	}
	
	
	public function registerCheckAction() {
		$request = $this->getRequest();
	
		if ($request->getMethod() == "POST") {
			$user = new User();
	
			$form = $this->createFormBuilder($user)
			->add('email', 'email')
			->add('password', 'repeated', array('type' => 'password'))
			->add('display_name')
			->getForm();
			$form->bindRequest($request);
				
			if ($form->isValid()) {
				// Encrypt the password
				$password = $user->getPassword();
				//$this->get('session')->setFlash('info', "Encoding password " . $password);
				$factory = $this->get('security.encoder_factory');
				$encoder = $factory->getEncoder($user);
				$password = $encoder->encodePassword($password, $user->getSalt());
				$user->setPassword($password);
	
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($user);
				$em->flush();
				
				$this->get('session')->setFlash('success', "Registered successfully with email " . $user->getEmail() . ". Sign in to begin.");
				
				return $this->redirect($this->generateUrl('home'));
			} else {
				// Invalid
				$this->get('session')->setFlash('error', "Invalid form data");
				return $this->redirect($this->generateUrl('register'));
			}
		} else {
			// Show register form
			return $this->redirect($this->generateUrl('register'));
		}
	}
	
	// Show registration form
	public function registerAction() {
		$request = $this->getRequest();
		$user = new User();
	
		$form = $this->createFormBuilder($user)
		->add('email', 'email')
		->add('password', 'repeated', array('type' => 'password'))
		->add('display_name', 'text', array('required' => true))
		->getForm();
	
		if ($request->getMethod() == "POST") {
			// This should only happen now if they failed validation
			$form->bindRequest($request);
		}
	
		//$this->get('session')->setFlash('info', "AuthHash: " . $this->generateVerificationHash());
	
		return $this->render('DLauritzJeopardyMainBundle:User:register.html.twig',
				array('form' => $form->createView()));
	}
	
}
