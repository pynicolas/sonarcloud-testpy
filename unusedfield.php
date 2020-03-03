<?php
class PriorAuthorizationViewModel

{

    /**

     * @var PriorAuthorization

     */

    private $authorization;

    /**

     * @var PriorAuthorizationFormPresenter

     */

    private $formPresenter;

    /**

     * @var FormCollection

     */

    private $staysFormCollection;

    /**

     * @var FormCollection

     */

    private $servicesFormCollection;

    /**

     * @var FormCollection

     */

    private $diagnosesFormCollection;

    /**

     * @var FormCollection

     */

    private $ptpFormCollection;

    /**

     * @return FormCollection

     */

    public function getPeerToPeerFormCollection(): FormCollection

    {

        if ($this->ptpFormCollection === null) {

            $peerToPeers = $this->authorization->peerToPeerComments;

            $countPeerToPeers = count($peerToPeers);

            while ($countPeerToPeers < PriorAuthorization::MAX_PEER_TO_PEER_ROWS) {

                $peerToPeers[] = new PriorAuthorizationPeerToPeer();

                $countPeerToPeers ++;

            }

            $this->ptpFormCollection = new FormCollection(

                new FormInitializer(),

                new PeerToPeerFormCollectionValidator($this->authorization),

                PriorAuthorizationPeerToPeer::class,

                $peerToPeers

            );

        }

        return $this->ptpFormCollection;

    }

}