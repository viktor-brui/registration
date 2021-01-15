<?php

namespace application\lib;

class Xmldb {

    public function save() {
        if($this->getId() != null) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function login($login, $password) {
        $xml = simplexml_load_file($this->_table . ".xml");
        if ($xml && count($xml->children()) != 0) {
                $node = substr($this->_table, 0, -1);
                foreach ($xml->$node as $item) {
                    if ($item->login == $login && $item->password == $password) {
                        return $item->id;
                    }
                }
                return false;
        } else {
            return false;
        }
    }

    public function insert() {
        $xml = simplexml_load_file($this->_table . ".xml");
        $node = substr($this->_table, 0, -1);

        $ids = array();
        foreach ($xml->$node as $item) {
            $ids[] = (string)$item->id;
        }
        $element = $xml->addChild($node);
        $id = max($ids) + 1;
        $element->addChild('id', $id);

        foreach ($this->_cols as $col) {
            $method = 'get' . ucfirst($col);
            $element->addChild($col, $this->$method());
        }
        $xml->asXML($this->_table . '.xml');
        return $id;
    }

    public function read() {
        $xml = simplexml_load_file($this->_table . ".xml");
        $node = substr($this->_table, 0, -1);

        foreach ($xml->$node as $item) {
            if ($this->getId() == $item->id) {
                $row = array();
                foreach ($item as $col) {
                    $row[$col->getName()] = $col;
                }
                $this->setOptions($row);
                break;
            }
        }
    }

    public function update() {
        $xml = simplexml_load_file($this->_table . ".xml");
        $node = substr($this->_table, 0, -1);  
        
        foreach ($xml->$node as $item) {
            if ($this->getId() == $item->id) {

                foreach ($this->_cols as $col) {
                    $method = 'get' . ucfirst($col);
                    $xml->$node->$col = $this->$method();
                }

                $xml->asXML($this->_table . '.xml');
                break;
            }
        }
    }

    public function delete() {
        $xml = simplexml_load_file($this->_table . ".xml");
        $node = substr($this->_table, 0, -1);

        if ($this->getId() != null) {
            $nodes = $xml->xpath('/' . $this->_table . '/' . $node . '[id=' . $this->getId() . ']');
            if (count($nodes) > 0) {
                $dom = dom_import_simplexml($nodes[0]);
                $dom->parentNode->removeChild($dom);

                $xml->asXML($this->_table . '.xml');
            }
        }
    }

    public function setOptions($options) {
        $methods = get_class_methods($this);

        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
    }

    public function isUnique($field, $value) {
        $xml = simplexml_load_file($this->_table . ".xml");
        $node = substr($this->_table, 0, -1);

        foreach ($xml->$node as $item) {
            if ($item->$field == $value) {
                return false;
            }
        }
        return true;
    }
}
