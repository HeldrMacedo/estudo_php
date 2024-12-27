<?php
enum ZoomMode
{
    case Samll;
    case Medium;
    case Big;
    case SuperBig;
}

class Calendar
{
    private ZoomMode $mode;

    public function setZoomMode(ZoomMode $mode)
    {
        $this->mode = $mode;
    }

    public function show()
    {
        if ($this->mode == ZoomMode::Samll)
        {
            print 'Exibindo no modo pequeno';
        }
    }
}

$calendar = new Calendar();
$calendar->setZoomMode(ZoomMode::Samll);
$calendar->show();
