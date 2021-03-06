<?php
namespace MIRE\AdminBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('categories', EntityType::class, array(
                'class' => 'MIREAdminBundle:Categories',
                'choice_label' => 'nom',
                'multiple' => true
            ))
            ->add('auteur', EntityType::class, array(
                'class' => 'MIREAdminBundle:Auteur',
                'choice_label' => 'nom',
                'multiple' => false
            ))
            ->add('imagefile', FileType::class, array('label' => 'Image(JPG or PNG file)'))
            ->add('titre',TextType::class)
            ->add('contenu',TextareaType::class)
            ->add('published',CheckboxType::class)
            ->add('motcle', TextareaType::class)
            ->add('save',SubmitType::class, array('label' => 'Enregistrer'))
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