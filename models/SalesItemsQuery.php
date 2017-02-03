<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SalesItems]].
 *
 * @see SalesItems
 */
class SalesItemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SalesItems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SalesItems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
