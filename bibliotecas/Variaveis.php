<?php

/**
 * Description of Variaveis
 *
 * @author gustavo
 */
function PDOParamType($x) {
    switch (gettype($x)) {
        case "integer":
            return PDO::PARAM_INT;
        case "string":
            return PDO::PARAM_STR;
        case "boolean":
            return PDO::PARAM_BOOL;
    }
}
