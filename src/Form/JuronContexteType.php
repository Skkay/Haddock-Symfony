<?php

namespace App\Form;

use App\Entity\JuronContexte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JuronContexteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('refAlbum')
            ->add('placeBande')
            ->add('numPage')
            ->add('numCase')
            ->add('num')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JuronContexte::class,
        ]);
    }
}
