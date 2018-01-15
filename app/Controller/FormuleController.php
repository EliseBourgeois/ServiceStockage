<?php
/**
 * Created by PhpStorm.
 * User: Elise
 * Date: 14/01/2018
 * Time: 17:25
 */

namespace app\Controller;

use app\Entity\Formule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;

class FormuleController extends Controller
{
    public function addAction(Request $request)
    {
        //création de l'objet Formule
        $formule = new Formule();

        // création du FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class,$formule);

        //ajout du champs de choix de la formule
        $formBuilder
            ->add('formule', ChoiceType::class)
            ;
        //génération du formulaire
        $form = $formBuilder->getForm();

        //création de la vue
        return $this->render('formule/newindex.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}