<?php
namespace Library\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LibraryFiles Model
 *
 * @method \Library\Model\Entity\LibraryFile get($primaryKey, $options = [])
 * @method \Library\Model\Entity\LibraryFile newEntity($data = null, array $options = [])
 * @method \Library\Model\Entity\LibraryFile[] newEntities(array $data, array $options = [])
 * @method \Library\Model\Entity\LibraryFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Library\Model\Entity\LibraryFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Library\Model\Entity\LibraryFile[] patchEntities($entities, array $data, array $options = [])
 * @method \Library\Model\Entity\LibraryFile findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LibraryFilesTable extends Table
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

        $this->setTable('library_files');
        $this->setDisplayField('name');
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('size', 'create')
            ->notEmpty('size');

        return $validator;
    }
}
