<?php

namespace Sopinet\ChatBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ChatAdmin extends AbstractAdmin
{
    /**
     * Default Datagrid values
     *
     * @var array
     */
    protected $datagridValues = array(
        '_sort_by' => 'createdAt',
        '_sort_order' => 'DESC', // Descendant ordering (default = 'ASC')
    );

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('name')
            ->add('chatMembers')
            ->add('admin')
            ->add('createdAt', 'doctrine_orm_date', array(
                    'field_type' => 'sonata_type_date_picker',
                    'format' => 'd/m/Y'
                )
            )
            ->add('updatedAt', 'doctrine_orm_date', array(
                    'field_type' => 'sonata_type_date_picker',
                    'format' => 'd/m/Y'
                )
            )
            ->add('deletedAt', 'doctrine_orm_date', array(
                    'field_type' => 'sonata_type_date_picker',
                    'format' => 'd/m/Y'
                )
            )
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('chatMembers')
            ->add('admin')
            ->add('createdAt', 'date', array(
                    'format' => 'd/m/Y'
                )
            )
            ->add('updatedAt', 'date', array(
                    'format' => 'd/m/Y'
                )
            )
            ->add('deletedAt', 'date', array(
                    'format' => 'd/m/Y'
                )
            )
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('groupPhoto', 'vich_image', array(
                'label' => false,
                'required' => false,
                'allow_delete' => false,
                'download_link' => true,
            ))
            ->add('name')
            ->add('chatMembers', null, array(
                'disabled' => false,
                'by_reference' => false
            ))
            ->add('admin')
            ->add('deletedAt', 'sonata_type_date_picker', array(
                    'format' => 'dd/MM/yyyy',
                    'required' => false,
                )
            )
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('chatMembers')
            ->add('admin')
            ->add('messages')
            ->add('createdAt', 'date', array(
                    'format' => 'd/m/Y'
                )
            )
            ->add('updatedAt', 'date', array(
                    'format' => 'd/m/Y'
                )
            )
            ->add('deletedAt', 'date', array(
                    'format' => 'd/m/Y'
                )
            )
        ;
    }
}
