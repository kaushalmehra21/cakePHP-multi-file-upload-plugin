<?php
namespace Library\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LibrarySettings Model
 *
 * @method \Library\Model\Entity\LibrarySetting get($primaryKey, $options = [])
 * @method \Library\Model\Entity\LibrarySetting newEntity($data = null, array $options = [])
 * @method \Library\Model\Entity\LibrarySetting[] newEntities(array $data, array $options = [])
 * @method \Library\Model\Entity\LibrarySetting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Library\Model\Entity\LibrarySetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Library\Model\Entity\LibrarySetting[] patchEntities($entities, array $data, array $options = [])
 * @method \Library\Model\Entity\LibrarySetting findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LibrarySettingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('library_settings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('plugin_key', 'create')
            ->notEmpty('plugin_key');

        $validator
            ->requirePresence('plugin_value', 'create')
            ->notEmpty('plugin_value');

        return $validator;
    }
}
