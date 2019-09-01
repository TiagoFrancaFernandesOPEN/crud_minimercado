<?php
function diaDaSemana()
{
  switch (strtolower(date('D'))) {
    case 'sun':
    return 'Domingo';
      break;
    case 'mon':
    return 'Segunda-feira';
      break;
    case 'tue':
    return 'Terça-feira';
      break;
    case 'wed':
    return 'Quarta-feira';
      break;
    case 'thu':
    return 'Quinta-feira';
      break;
    case 'fri':
    return 'Sexta-feira';
      break;
    case 'sat':
    return 'Sábado';
      break;
    default:
    return '';
  }
}