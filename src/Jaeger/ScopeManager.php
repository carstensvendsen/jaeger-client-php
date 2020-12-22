<?php

namespace Jaeger;

use OpenTracing\ScopeManager as OTScopeManager;
use OpenTracing\Span as OTSpan;
use OpenTracing\Scope as OTScope;

/**
 * {@inheritdoc}
 */
class ScopeManager implements OTScopeManager
{
    /**
     * @var OTScope
     */
    private $active;

    /**
     * {@inheritdoc}
     */
    public function activate(OTSpan $span, bool $finishSpanOnClose = true): Scope
    {
        $this->active = new Scope($this, $span, $finishSpanOnClose);

        return $this->active;
    }

    /**
     * {@inheritdoc}
     */
    public function getActive(): ?Scope
    {
        return $this->active;
    }

    /**
     * Sets the scope as active.
     * @param OTScope|null $scope
     */
    public function setActive(OTScope $scope = null)
    {
        $this->active = $scope;
    }
}
