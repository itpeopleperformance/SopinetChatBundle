<?php

namespace Sopinet\ChatBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class DeviceAdmin extends AbstractAdmin
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
            ->add('deviceId')
            ->add('deviceGCMId')
            ->add('user')
            ->add(
                'created_at',
                'doctrine_orm_date',
                array(
                    'field_type' => 'sonata_type_date_picker',
                    'format' => 'd/m/Y'
                )
            )
            ->add('deviceType');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('deviceId')
            ->add('user')
            ->add(
                'created_at',
                'date',
                array(
                    'format' => 'd/m/Y'
                )
            )
            ->add('deviceGCMId')
            ->add('deviceType')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('deviceId')
            ->add('deviceGCMId')
            ->add('user')
            ->add('deviceType');
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('deviceId')
            ->add('deviceGCMId')
            ->add('user')
            ->add(
                'created_at',
                'date',
                array(
                    'format' => 'd/m/Y'
                )
            )
            ->add('deviceType');
    }
}
