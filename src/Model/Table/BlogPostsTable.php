<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogPosts Model
 *
 * @method \App\Model\Entity\BlogPost get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlogPost newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BlogPost[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogPost|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogPost patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlogPost[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogPost findOrCreate($search, callable $callback = null, $options = [])
 */
class BlogPostsTable extends Table
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

        $this->table('blog_posts');
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('img_url', 'create')
            ->notEmpty('img_url');

        $validator
            ->requirePresence('body_text', 'create')
            ->notEmpty('body_text');

        $validator
            ->requirePresence('date_published', 'create')
            ->notEmpty('date_published');

        $validator
            ->requirePresence('last_edited', 'create')
            ->notEmpty('last_edited');

        $validator
            ->integer('published')
            ->requirePresence('published', 'create')
            ->notEmpty('published');

        return $validator;
    }
}
