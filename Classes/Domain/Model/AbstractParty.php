<?php
namespace TYPO3\Party\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Party".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * A party
 *
 * @scope prototype
 * @entity
 * @InheritanceType("JOINED")
 */
abstract class AbstractParty {

	/**
	 * @var \Doctrine\Common\Collections\Collection<\TYPO3\FLOW3\Security\Account>
	 * @OneToMany(mappedBy="party")
	 */
	protected $accounts;

	/**
	 * Constructor
	 *
	 * @return void
	 * @author Andreas Förthner <andreas.foerthner@netlogix.de>
	 */
	public function __construct() {
		$this->accounts = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Assigns the given account to this party. Note: The internal reference of the account is
	 * set to this party.
	 *
	 * @param \TYPO3\FLOW3\Security\Account $account The account
	 * @return void
	 * @author Andreas Förthner <andreas.foerthner@netlogix.de>
	 */
	public function addAccount(\TYPO3\FLOW3\Security\Account $account) {
		$this->accounts->add($account);
		$account->setParty($this);
	}

	/**
	 * Remove an account from this party
	 *
	 * @param \TYPO3\FLOW3\Security\Account $account The account to remove
	 * @return void
	 * @author Andreas Förthner <andreas.foerthner@netlogix.de>
	 */
	public function removeAccount(\TYPO3\FLOW3\Security\Account $account) {
		$this->accounts->removeElement($account);
	}

	/**
	 * Returns the accounts of this party
	 *
	 * @return \Doctrine\Common\Collections\Collection All assigned TYPO3\FLOW3\Security\Account objects
	 * @author Andreas Förthner <andreas.foerthner@netlogix.de>
	 */
	public function getAccounts() {
		return $this->accounts;
	}

}
?>