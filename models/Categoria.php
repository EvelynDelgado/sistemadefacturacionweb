<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "categoria".
 *
 * @property int $id
 * @property string $nombre
 * @property string $seo_slug
 * @property string $imagen
 *
 * @property Producto[] $productos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }
    
      public function behaviors() {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'nombre',
                'slugAttribute' => 'seo_slug',
                'immutable' => true,
                'ensureUnique' => true,
            ],
        ];
    }
    public $_image;

    public function beforeSave($insert) {
        if (is_string($this->_image) && strstr($this->_image, 'data:image')) {

            // creating image file as png
            $data = $this->_image;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
            $fileName = time() . '-' . rand(100000, 999999) . '.png';
            file_put_contents('imagenes/categorias/' . $fileName, $data);


            // deleting old image 
            // $this->image is real attribute for filename in table
            // customize your code for your attribute            
            if (!$this->isNewRecord && !empty($this->imagen)) {
                unlink($this->imagen);
            }

            // set new filename
            $this->imagen = 'imagenes/categorias/' . $fileName;
        }

        return parent::beforeSave($insert);
    }
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_image'], 'safe'],
            [['nombre'], 'required'],
            [['nombre', 'seo_slug', 'imagen'], 'string', 'max' => 255],
            [['descripcion'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'seo_slug' => 'Seo Slug',
            'imagen' => 'Imagen',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['categoria_id' => 'id']);
    }
}
