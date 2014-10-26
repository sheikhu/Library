<?php

namespace Sheikhu\LibraryBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LivreType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isbn')
            ->add('titre')
            ->add('synopsis', null, [
                'attr'  =>  ['class' => 'summernote']
            ])
            ->add('dateParution')
            ->add('dateAcquis')
            ->add('statut')
            ->add('categorie')
            ->add('auteurs')
            ->add('maisonEdition')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sheikhu\LibraryBundle\Entity\Livre'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'livre';
    }
}
