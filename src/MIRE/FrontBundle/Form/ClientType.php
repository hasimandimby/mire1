<?php

namespace MIRE\FrontBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ClientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('email',TextType::class)
            ->add('adresse',TextareaType::class)
            ->add('ville',TextType::class)
            ->add('cp',TextType::class)
            ->add('pays',TextType::class)
            ->add('mobile',TextType::class)
            ->add('telephone',TextType::class)
            ->add('password',PasswordType::class)
            ->add('save',SubmitType::class, array('label' => 's\'inscrire'))

            // ->add('categories')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MIRE\AdminBundle\Entity\Client'
        ));
    }
}
