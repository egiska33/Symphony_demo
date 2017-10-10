<?php





namespace AppBundle\Controller;

use AppBundle\Model\TextInput;
use Parsedown;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class MarkdownController extends Controller
{
    /**
     * @Route("/convert")
     * @param Request $request
     * @return Response
     */
    public function convertAction(Request $request)
    {
        $data = new TextInput();
        $form = $this->createFormBuilder($data)
            ->add('text', TextareaType::class)
            ->add('submit', SubmitType::class)
            ->getForm()
        ;
        $form->handleRequest($request);

        $userText = $form->getData()->text;
        $parsedown = new Parsedown();
        $markdownText = $parsedown->text($userText);


        return $this->render('AppBundle:Markdown:convert.html.twig', array(
            'form' => $form->createView(),
            'text' => $markdownText,
        ));
    }
}