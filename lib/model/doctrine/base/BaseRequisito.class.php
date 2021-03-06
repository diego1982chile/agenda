<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Requisito', 'doctrine');

/**
 * BaseRequisito
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_requisito
 * @property string $nombre_requisito
 * @property string $descripcion_requisito
 * @property Doctrine_Collection $ConjuntoRequisitos
 * 
 * @method integer             getIdRequisito()           Returns the current record's "id_requisito" value
 * @method string              getNombreRequisito()       Returns the current record's "nombre_requisito" value
 * @method string              getDescripcionRequisito()  Returns the current record's "descripcion_requisito" value
 * @method Doctrine_Collection getConjuntoRequisitos()    Returns the current record's "ConjuntoRequisitos" collection
 * @method Requisito           setIdRequisito()           Sets the current record's "id_requisito" value
 * @method Requisito           setNombreRequisito()       Sets the current record's "nombre_requisito" value
 * @method Requisito           setDescripcionRequisito()  Sets the current record's "descripcion_requisito" value
 * @method Requisito           setConjuntoRequisitos()    Sets the current record's "ConjuntoRequisitos" collection
 * 
 * @package    agenda
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRequisito extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('requisito');
        $this->hasColumn('id_requisito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nombre_requisito', 'string', 40, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 40,
             ));
        $this->hasColumn('descripcion_requisito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('ConjuntoRequisitos', array(
             'local' => 'id_requisito',
             'foreign' => 'id_requisito'));
    }
}