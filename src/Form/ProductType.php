<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
        ->add('product', TextType::class, array(
			'label' => false,
            'label_attr' => [
                'class' => 'form-label'
            ],
            'attr' => [
                'placeholder' => 'Nombre'
            ]
		))
        ->add('description', TextareaType::class, array(
			'label' => false,
            'label_attr' => [
                'class' => 'form-label'
            ],
            'attr' => [
                'placeholder' => 'Descripcion'
            ]
		))
        ->add('price', TextType::class, array(
			'label' => false,
            'label_attr' => [
                'class' => 'form-label'
            ],
            'attr' => [
                'placeholder' => 'Precio'
            ]
		))
        ->add('submit', SubmitType::class, array(
			'label' => 'Enviar',
            'attr' => [
                'class' => 'btn btn-primary float-end'
            ]
		));

    }
}