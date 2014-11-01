<?php

namespace Sheikhu\LibraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PretType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('membre', null, array(
                'disabled' => true,
                'read_only' => true
            ))
            ->add('exemplaires', null, array('label' => 'Livres'))
            ->add('dateRetourPrevue', 'date')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sheikhu\LibraryBundle\Entity\Pret'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sheikhu_librarybundle_pret';
    }
}
