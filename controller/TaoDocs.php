<?php
/**  
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
 * Copyright (c) 2018 (original work) Open Assessment Technologies SA;
 *               
 * 
 */

namespace oat\taoDocs\controller;

/**
 * Sample controller
 *
 * @author Open Assessment Technologies SA
 * @package taoDocs
 * @license GPL-2.0
 *
 */
class TaoDocs extends \tao_actions_CommonModule {

    /**
     * initialize the services
     */
    public function __construct(){
        parent::__construct();
        $this->pilots = [];
    }

    /**
     * A possible entry point to tao
     */
    public function index() {
        echo __("Hello World"); // direct output
    }

    public function helloExample() {
        $this->setData('name', 'Martin');
        $this->setView('TaoDocs/myName.tpl');
    }

    public function myName() {
        $name = 'tao';

        if($this->hasRequestParameter('uri')) {
            $uri = $this->getRequestParameter('uri');
            if(array_key_exists($uri, $this->pilots)) {
                $name = $this->pilots[$uri];
            }
        }

        $this->setData('name', $name);
        $this->setView('TaoDocs/myName.tpl');
    }

    public function getPilotsList() {
        $this->pilots =
            [
                'luke',
                'biggs',
                'wedge',
                'vader'
            ];

        $data = array(
            'data'  => __("Pilots"),
            'attributes' => array(
                'id' => 1,
                'class' => 'node-class'
            ),
            'children' => array()
        );

        foreach ($this->pilots as $index => $name) {
            $data['children'][] =  array(
                'data'  => 'my name is ' . ucfirst($name),
                'attributes' => array(
                    'id' => 'name_' . $index,
                    'class' => 'node-instance'
                )
            );
        }
        echo json_encode($data);
    }

    public function vader() {
        $name = '';
        if($this->hasRequestParameter('uri')) {
            $uri = $this->getRequestParameter('uri');
            if(array_key_exists($uri, $this->pilots)) {
                $name = $this->pilots[$uri];
            }
        }
        echo ucfirst($name) . ', I\'m your father';

    }

}