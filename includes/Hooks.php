<?php
/*
 *  NoTitle
 *  Adds a magic word that hides the main title heading in a page
 *
 * @file
 * @author Tony Boyles
 */

namespace MediaWiki\Extension\NoTitle;

use MediaWiki\Hook\GetDoubleUnderscoreIDsHook;
use MediaWiki\Output\Hook\OutputPageParserOutputHook;
use MediaWiki\Output\OutputPage;
use MediaWiki\Parser\ParserOutput;

class Hooks implements
	GetDoubleUnderscoreIDsHook,
	OutputPageParserOutputHook
{

	/**
	 * @param array &$doubleUnderscoreIDs
	 */
	public function onGetDoubleUnderscoreIDs( &$doubleUnderscoreIDs ) {
		$doubleUnderscoreIDs[] = 'notitle';
	}

	/**
	 * @param OutputPage $out
	 * @param ParserOutput $pOut
	 */
	public function onOutputPageParserOutput( $out, $pOut ): void {
		if ( $pOut->getPageProperty( 'notitle' ) !== null ) {
			$out->addModuleStyles( 'ext.NoTitle' );
		}
	}
}
