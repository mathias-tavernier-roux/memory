<?php
class IA 
{
    private $_LEVEL;
    private $_MEMORY_LVL;
    private $_DATA;
    private $_TEMP;
    //DEBUG DATA FOR CREATE TABLE DATA (TESTMODE)

    public function __construct($LVL)
    {
        $this->_LEVEL = $LVL;
        $this->_DATA[0] = 'DATA';
        // Set Memory Level of IA (1 = Save Card Data Everytime)
    }
    public function tour()
    {
        for ($LINE = 1; array_key_exists($LINE, $this->_DATA); $LINE)
        {
            $LINE = $LINE + 1;
        }
        // DEBUG SCRIPT FOR VIEW LINE RESULT
        //echo $LINE;
    $ch = curl_init();                    // Initiate cURL
    $url = "index.php"; // Where you want to post data
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, true);  // Tell cURL you want to post something
    curl_setopt($ch, CURLOPT_POSTFIELDS, "card_value=$LINE"); // Define what you want to post
    $output = curl_exec ($ch); // Execute
    curl_close ($ch); // Close cURL handle
    $this->_TEMP = $deck[$LINE]->get_value();
        $CARD = $this->_TEMP + $this->_LEVEL;
        $CARDPOS = array_search($CARD, $this->_DATA);
        if ($CARDPOS == false)
        {
            if (rand (1,$this->_MEMORY_LVL) == 1)
                {
                    $this->_DATA[$LINE] = $this->_TEMP;  
                }
        }
        else
        {
            $ch = curl_init();                    // Initiate cURL
            $url = "index.php"; // Where you want to post data
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, true);  // Tell cURL you want to post something
            curl_setopt($ch, CURLOPT_POSTFIELDS, "card_value=$CARDPOS"); // Define what you want to post
            $output = curl_exec ($ch); // Execute
            curl_close ($ch); // Close cURL handle
        }
        //echo "MEMORY STATE";
        //print_r($this->_DATA);
        //echo "TABLE DATA";
        //print_r($this->_TDATA);
    }
}
?>