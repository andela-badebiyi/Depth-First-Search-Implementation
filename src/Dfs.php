<?php
/**
 * Dfs Class.
 *
 * This class takes an $tree represented with an array as a constructor
 * and traverses through the tree using the depth first search algorithm
 *
 * @author Adebiyi Bodunde
 */
namespace bd;

class Dfs
{
  /**
   * this is the stack that holds our nodes
   * @var array
   */
  private $stack = [];

  /**
   * this array holds our visited nodes
   * @var array
   */
  private $visited = [];

  /**
   * this array holds the final results
   * @var array
   */
  private $output = [];

  /**
   * the tree that is to be traversed with dfs
   * @var array
   */
  private $tree;

  /**
   * this holds the current working node in dfs
   * @var array
   */
  private $curr_working_node;

  /** Initialize tree and working node */
  public function __construct($tree=[0], $curr_working_node=null){
    $this->tree = $tree;

    if($curr_working_node){
      $this->curr_working_node = $curr_working_node;
    } else {
      $this->curr_working_node = array_keys($this->tree)[0];
    }

    array_push($this->stack, $this->curr_working_node);
  }

  /**
   * set tree that is to be traversed
   * @param array $new_tree - new tree we want to traverse
   */
  public function setTree($new_tree){
    $this->resetValues();
    $this->tree = $new_tree;
    $this->setCurrWorkingNode(array_keys($new_tree)[0]);
  }

  /**
   * setCurrWorkingNode description
   * @param [type] $curr_working_node [description]
   */
  public function setCurrWorkingNode($curr_working_node){
    $this->curr_working_node = $curr_working_node;
    array_push($this->stack, $this->curr_working_node);
  }

  /**
   * Fetch the out after dfs has been run
   * @return array - result of dfs operation
   */
  public function getOutput(){
    return $this->output;
  }

  /**
   * reset values for new search
   * @return null
   */
  public function resetValues(){
      $this->stack = [];
      $this->visited = [];
      $this->output = [];
  }

  /**
   * Run dfs
   */
  public function run(){
    $this->search($this->tree, $this->curr_working_node);
  }

  /**
   * performs the dfs on $tree
   * @param  array $tree              - tree to be traversed
   * @param  array $curr_working_node - starting node
   */
  private function search($tree, $curr_working_node){
    array_push($this->output, $curr_working_node);

    if(!$this->stackIsEmpty()){
      if(!in_array($curr_working_node, $this->visited)){
        array_push($this->visited, $curr_working_node);

        if($this->hasChildren($tree, $curr_working_node)){
          foreach($tree[$curr_working_node] as $new_curr_working_node){
            array_push($this->stack, $new_curr_working_node);
            $this->search($tree, $new_curr_working_node);
          }
        } else {
          array_pop($this->stack);
        }
      }
    }

    return;
  }

  /**
   * checks if node in tree has children
   * @param  array  $tree   - tree being traversed
   * @param  array  $node   - node being checked for childre
   * @return boolean
   */
  private function hasChildren($tree, $node){
    return isset($tree[$node]) ? true : false;
  }

  /**
   * checks if stack is empty
   * @return boolean
   */
  private function stackIsEmpty(){
    return count($this->stack) ? false : true;
  }
}
