<?php
/**
 * Created by PhpStorm.
 * User: z01d
 * Date: 10/31/14
 * Time: 1:39 PM
 */

namespace Acme\StoreBundle\Newsletter;

use Acme\StoreBundle\Mailer;

class NewsletterManager {

    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
        echo "NewsletterManager instantiated<br />";
    }


} 