<?php

namespace app\helpers;

use yii\grid\ActionColumn;
use yii\helpers\Html;
use Yii;

class botonesPersonalizados extends ActionColumn {

    /**
     * Initializes the default button rendering callbacks.
     */
    protected function initDefaultButtons() {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Ver detalle'),
                    'aria-label' => Yii::t('yii', 'Ver detalle'),
                    'data-pjax' => '0',
                        ], $this->buttonOptions);
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], [
                    'class' => 'btn btn-info'
                    ], $options);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Modificar'),
                    'aria-label' => Yii::t('yii', 'Modificar'),
                    'data-pjax' => '0',
                        ], $this->buttonOptions);
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], [
                    
                    'class' => 'btn btn-primary'
                    ], $options);
            };
        }
        /* if (!isset($this->buttons['delete'])) {
          $this->buttons['delete'] = function ($url, $model, $key) {
          $options = array_merge([
          'title' => Yii::t('yii', 'Eliminar'),
          'aria-label' => Yii::t('yii', 'Eliminar'),
          'data-confirm' => Yii::t('yii', '¿Está seguro de que eliminar el item seleccionado?'),
          'data-method' => 'post',
          'data-pjax' => '0',
          ], $this->buttonOptions);
          return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['eliminar', 'id' => $model->id],
         * ['class' => 'btn btn-danger'],$options);
          };
          }
          } */
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Delete'),
                    'aria-label' => Yii::t('yii', 'Eliminar'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                        ],
                        ['class' => 'btn btn-danger'],
                        $this->buttonOptions);
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], $options);
            };
        }
    }

    /**
     * Initializes the default button rendering callback for single button
     * @param string $name Button name as it's written in template
     * @param string $iconName The part of Bootstrap glyphicon class that makes it unique
     * @param array $additionalOptions Array of additional options
     * @since 2.0.11
     */
    protected function initDefaultButton($name, $iconName, $additionalOptions = []) {
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                $title = Yii::t('yii', ucfirst($name));
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                    'title' => 'atata'
                        ], $additionalOptions, $this->buttonOptions);
                $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                return Html::a($icon, $url, $options);
            };
        }
    }

}
