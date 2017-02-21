<?php

namespace FG\NewsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class NewsletterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')->add('date', DateTimeType::class ,array('date_widget'=> 'single_text'))->add('type')->add('refdd', TextType::class , array('label' => 'Ref du deal (facultatif)', 'required'=>false ))->add('dealComment' , TextType::class , array('label' => 'Commentaire sur le Deal (facultatif)', 'required'=>false ))->add('comment')->add('image', FileType::class)->add('Sauvegarder', SubmitType::class)        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FG\NewsBundle\Entity\Newsletter'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fg_newsbundle_newsletter';
    }


}
