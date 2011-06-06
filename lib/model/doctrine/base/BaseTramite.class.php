<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Tramite', 'doctrine');

/**
 * BaseTramite
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_tramite
 * @property string $nombre_tramite
 * @property string $descripcion_tramite
 * @property Doctrine_Collection $ConjuntoExamenes
 * @property Doctrine_Collection $ConjuntoRequisitos
 * 
 * @method integer             getIdTramite()           Returns the current record's "id_tramite" value
 * @method string              getNombreTramite()       Returns the current record's "nombre_tramite" value
 * @method string              getDescripcionTramite()  Returns the current record's "descripcion_tramite" value
 * @method Doctrine_Collection getConjuntoExamenes()    Returns the current record's "ConjuntoExamenes" collection
 * @method Doctrine_Collection getConjuntoRequisitos()  Returns the current record's "ConjuntoRequisitos" collection
 * @method Tramite             setIdTramite()           Sets the current record's "id_tramite" value
 * @method Tramite             setNombreTramite()       Sets the current record's "nombre_tramite" value
 * @method Tramite             setDescripcionTramite()  Sets the current record's "descripcion_tramite" value
 * @method Tramite             setConjuntoExamenes()    Sets the current record's "ConjuntoExamenes" collection
 * @method Tramite             setConjuntoRequisitos()  Sets the current record's "ConjuntoRequisitos" collection
 * 
 * @package    agenda
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTramite extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tramite');
        $this->hasColumn('id_tramite', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nombre_tramite', 'string', 40, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 40,
             ));
        $this->hasColumn('descripcion_tramite', 'string', 512, array(
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
        $this->hasMany('ConjuntoExamenes', array(
             'local' => 'id_tramite',
             'foreign' => 'id_tramite'));

        $this->hasMany('ConjuntoRequisitos', array(
             'local' => 'id_tramite',
             'foreign' => 'id_tramite'));
    }
}