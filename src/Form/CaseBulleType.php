<?php

namespace App\Form;

use App\Entity\CaseBulle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CaseBulleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('refAlbum')
            ->add('pageNum')
            ->add('bandePlace')
            ->add('caseNum')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CaseBulle::class,
        ]);
    }
}
