<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * CommunityLogo cell
 */
class CommunityLogoCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($id = null)
    {
        $logoUrl = 'community/logo/56x56/default.png';

        if($id != null)
        {
            $this->loadModel('Communities');

            $usersImage = $this->Communities
            ->find()
            ->select(['logo'])
            ->where(['id' => $id])
            ->first();

            if($usersImage->logo != null)
            {
                $logoUrl = 'community/logo/56x56/'.$usersImage->logo;
            }
        }

        $this->set('logo_url', $logoUrl);
    }
}
