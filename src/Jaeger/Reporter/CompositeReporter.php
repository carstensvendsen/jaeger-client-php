<?php

namespace Jaeger\Reporter;

use Jaeger\Span;

/**
 * CompositeReporter delegates reporting to one or more underlying reporters.
 */
class CompositeReporter implements ReporterInterface
{
    /** @var ReporterInterface[] */
    private $reporters;

    public function __construct(ReporterInterface ...$reporters)
    {
        $this->reporters = $reporters;
    }

    public function reportSpan(Span $span)
    {
        foreach ($this->reporters as $reporter) {
            $reporter->reportSpan($span);
        }
    }

    public function close()
    {
        foreach ($this->reporters as $reporter) {
            $reporter->close();
        }
    }
}