<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemPromotions Model
 *
 * @method \App\Model\Entity\ItemPromotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItemPromotion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItemPromotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItemPromotion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItemPromotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItemPromotion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItemPromotion findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemPromotionsTable extends Table
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

        $this->table('item_promotions');
        $this->displayField('id');
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
            ->integer('itemID')
            ->allowEmpty('itemID');

        $validator
            ->integer('promotionID')
            //->requirePresence('promotionID', 'create')
            ->allowEmpty('promotionID');

        $validator
            ->integer('hoursLeft')
            ->allowEmpty('hoursLeft');

        $validator
            ->decimal('priceWithPromotion')
            ->allowEmpty('priceWithPromotion');

        $validator
            ->allowEmpty('promoCode');

        return $validator;
    }
}
