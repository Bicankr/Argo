<?php

namespace Todo;

use Nette;

class Ochrana_rostlinRepository extends Repository {

    public function aktualizuj($id, $text, $odkaz) {
	$this->findBy(array('id' => $id))->update(array('text' => $text, 'odkaz' => $odkaz));
    }

    /**
     * Vrací seznam nehotových úkolů.
     * @return Nette\Database\Table\Selection
     */
    public function findIncomplete() {
	return $this->findBy(array('done' => false))->order('created ASC');
    }

    /**
     * @return Nette\Database\Table\Selection
     */
    public function findIncompleteByUser($userId) {
	return $this->findIncomplete()->where(array(
		    'user_id' => $userId
		));
    }

    /**
     * @param int $listId
     * @param string $task
     * @param int $assignedUser
     * @return Nette\Database\Table\ActiveRow
     */
    public function createTask($listId, $task, $assignedUser) {
	return $this->getTable()->insert(array(
		    'text' => $task,
		    'user_id' => $assignedUser,
		    'created' => new \DateTime(),
		    'list_id' => $listId,
		));
    }

}
