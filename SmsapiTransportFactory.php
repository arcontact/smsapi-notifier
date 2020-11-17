<?php

namespace Symfony\Component\Notifier\Bridge\Smsapi;

use Symfony\Component\Notifier\Exception\UnsupportedSchemeException;
use Symfony\Component\Notifier\Transport\AbstractTransportFactory;
use Symfony\Component\Notifier\Transport\Dsn;
use Symfony\Component\Notifier\Transport\TransportInterface;

/**
 * @author Tomasz Majerski <tomasz@arcontact.pl>
 */
final class SmsapiTransportFactory extends AbstractTransportFactory
{
    /**
     * @return SmsapiTransport
     */
    public function create(Dsn $dsn): TransportInterface
    {
        $scheme = $dsn->getScheme();
        $authToken = $dsn->getUser();
        $host = 'default' === $dsn->getHost() ? null : $dsn->getHost();
        $from = $dsn->getOption('from');
        $port = $dsn->getPort();

        if ('smsapi' === $scheme) {
            return (new SmsapiTransport($authToken, $from, $this->client, $this->dispatcher))->setHost($host)->setPort($port);
        }

        throw new UnsupportedSchemeException($dsn, 'smsapi', $this->getSupportedSchemes());
    }

    protected function getSupportedSchemes(): array
    {
        return ['smsapi'];
    }
}
