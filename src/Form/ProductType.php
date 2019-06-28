<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price', null, [
                "label" => "Prix"
            ])
           //->add('nbViews')
           //->add('createAt')
            //->add('updateAt')
            ->add('isPublished')
            ->add('imageName')
            //->add('slug')
            //->add('tags')
            ->add('categorie')
            ->add('submit', SubmitType::class, [
                'label' => 'Créer le produit'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
