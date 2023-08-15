<?php

namespace PatternSetter;

class PatternSetter
{
    private $pattern;

    public function __construct()
    {

    }

    public function setPattern($pattern)
    {
        if (isset($this->pattern))
            $result = ['result' => 'pattern exist'];
        else {
            $this->pattern = $pattern;
            $result = ['result' => 'pattern set'];
        }
        return json_encode($result);
    }

    public function getPattern()
    {
        if (isset($this->pattern))
            $result = ['result' => $this->pattern];
        else
            $result = ['result' => 'there is no pattern'];
        return json_encode($result);
    }

    public function unsetPattern()
    {
        if (!empty($this->pattern)) {
            unset($this->pattern);
            $result = ['result' => 'pattern unset'];
        } else
            $result = ['result' => 'there is no pattern'];
        return json_encode($result);
    }

    public function testPattern($path)
    {
        if (!empty($this->pattern)) {
            if (@preg_match_all('/' . $this->pattern . '/', $path, $matches))
                $result = ['result' => $matches];
            else
                $result = ['result' => 'there is no matches'];
        } else
            $result = ['result' => 'there is no pattern'];
        return json_encode($result);
    }
}
