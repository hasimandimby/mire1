<?php

namespace MIRE\AdminBundle\Form;
use  MIRE\AdminBundle\Form\ImageType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('date',DateType::class)
            ->add('image_id',ImageType::class)
            ->add('titre',TextType::class)
            ->add('contenu',TextareaType::class)
            ->add('id_auteur',IntegerType::class)
            ->add('published',CheckboxType::class)
            ->add('motcle', TextareaType::class)
            ->add('save',SubmitType::class, array('label' => 'Modifier un article'))

           // ->add('categories')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MIRE\AdminBundle\Entity\Article'
        ));
    }
}
