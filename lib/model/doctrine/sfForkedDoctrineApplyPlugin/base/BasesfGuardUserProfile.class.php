<?php

/**
 * BasesfGuardUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $email_new
 * @property string $nombres
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $rut
 * @property timestamp $validate_at
 * @property string $validate
 * @property sfGuardUser $User
 * 
 * @method integer            getUserId()           Returns the current record's "user_id" value
 * @method string             getEmailNew()         Returns the current record's "email_new" value
 * @method string             getNombres()          Returns the current record's "nombres" value
 * @method string             getApellidoPaterno()  Returns the current record's "apellido_paterno" value
 * @method string             getApellidoMaterno()  Returns the current record's "apellido_materno" value
 * @method string             getRut()              Returns the current record's "rut" value
 * @method timestamp          getValidateAt()       Returns the current record's "validate_at" value
 * @method string             getValidate()         Returns the current record's "validate" value
 * @method sfGuardUser        getUser()             Returns the current record's "User" value
 * @method sfGuardUserProfile setUserId()           Sets the current record's "user_id" value
 * @method sfGuardUserProfile setEmailNew()         Sets the current record's "email_new" value
 * @method sfGuardUserProfile setNombres()          Sets the current record's "nombres" value
 * @method sfGuardUserProfile setApellidoPaterno()  Sets the current record's "apellido_paterno" value
 * @method sfGuardUserProfile setApellidoMaterno()  Sets the current record's "apellido_materno" value
 * @method sfGuardUserProfile setRut()              Sets the current record's "rut" value
 * @method sfGuardUserProfile setValidateAt()       Sets the current record's "validate_at" value
 * @method sfGuardUserProfile setValidate()         Sets the current record's "validate" value
 * @method sfGuardUserProfile setUser()             Sets the current record's "User" value
 * 
 * @package    agenda
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_profile');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('email_new', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('nombres', 'string', 32, array(
             'type' => 'string',
             'length' => 32,
             ));
        $this->hasColumn('apellido_paterno', 'string', 70, array(
             'type' => 'string',
             'length' => 70,
             ));
        $this->hasColumn('apellido_materno', 'string', 70, array(
             'type' => 'string',
             'length' => 70,
             ));
        $this->hasColumn('rut', 'string', 11, array(
             'type' => 'string',
             'length' => 11,
             ));
        $this->hasColumn('validate_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('validate', 'string', 33, array(
             'type' => 'string',
             'length' => 33,
             ));


        $this->index('validate', array(
             'fields' => 
             array(
              0 => 'validate',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}