<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemsTable extends Table
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

        $this->table('items');
        $this->displayField('title');
        $this->primaryKey('id');
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
            ->requirePresence('asin', 'create')
            ->notEmpty('asin');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('small_img_url', 'create')
            ->notEmpty('small_img_url');

        $validator
            ->requirePresence('medium_img_url', 'create')
            ->notEmpty('medium_img_url');

        $validator
            ->requirePresence('large_img_url', 'create')
            ->notEmpty('large_img_url');

        $validator
            ->requirePresence('list_price', 'create')
            ->notEmpty('list_price');

        $validator
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->requirePresence('normal_price', 'create')
            ->notEmpty('normal_price');

        $validator
            ->requirePresence('item_url', 'create')
            ->notEmpty('item_url');


        $validator
            ->requirePresence('publisher', 'create')
            ->notEmpty('publisher');

        return $validator;
    }
}
