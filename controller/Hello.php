<?php

class Hello extends tao_actions_CommonModule {

    public function myName() {
        $this->setData('myName', 'tao');
        $this->setView('myName.tpl');
    }
}