<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML LANG="en">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE>Reef Encounter </TITLE>
<LINK REL="stylesheet" HREF="pbw.css" TYPE="text/css">
</HEAD>
<BODY>
<script language="JavaScript" type="text/javascript">var ol_width = 60;</script>
<DIV ID="overDiv" STYLE="position:absolute; visibility:hidden; z-index:1000;"></DIV>
<SCRIPT LANGUAGE="JavaScript" type="text/javascript" SRC="overlib.js"><!-- overLIB (c) Erik Bosrup --></SCRIPT>
<DIV CLASS=normal_text>
	<TABLE CELLPADDING=3 CELLSPACING=0 WIDTH="100%">
		
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                 This is the heading which contains the heading all the way up to Rules  
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
		<TR>
			<TD>
				<BR>
				<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
					<TR>
						<TD COLSPAN=3>
							<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
								<TR VALIGN=BOTTOM>
									<TD ALIGN=LEFT><h1><B>REEF ENCOUNTER</B></h1></TD>
									<TD ALIGN=right><A CLASS=menu HREF="hw7db.php?act=returnpage&n=2">New Game</A>
									<TD ALIGN=right><A CLASS=menu HREF="gameLog.php?act=returnpage&g=hw7db.php">Display_Log file</A>
									<TD ALIGN=right><A CLASS=menu HREF="hw7db.php?act=saveGame&s=1">Save_Game State</A>
									<TD ALIGN=right><A CLASS=menu HREF="saveGame.php?s=2">Show Saved Game</A>
									<TD ALIGN=right><A CLASS=menu HREF="REWriteup.html">Rules</A>
									<?php
									
									// script for handling game saving and saved game display and new game
									$s = filter_input(INPUT_GET, "s");
                                                                        $n = filter_input(INPUT_GET, "n");
									if($s == 1){
                                                                            include_once 'saveGame.php'; // get saveGame file
                                                                            $sb0 = $_SESSION["sb0"];    // always guaranteed that this will be filled as it'll only occur after initial script
                                                                            $sb3 = $_SESSION["sb3"];
                                                                            saveFile($sb0, $sb3);       // save file if button is clicked
									}
									if($n == 2){
                                                                            // create connection to mysql database
                                                                            $conn = mysql_connect("localhost", "tofurum", "si1170zv");
                                                                            mysql_select_db("tofurum");

                                                                            // delete and recreate Files table to avoid double instanciation
                                                                            mysql_query("delete from Files"); 
                                                                            mysql_query("Create table Files (GameLog varchar(50))");
                                                                            
                                                                            mysql_close($conn);             // close db
                                                                            
                                                                            session_unset();                // clear everything and start new game
									}
									?>
								</TR>
							</TABLE>
						</TD>
					</TR>
					<TR>
						<TD COLSPAN=3 BGCOLOR=0066CC HEIGHT=1></TD>
					</TR>
					<TR>
						<TD COLSPAN=3 HEIGHT=1></TD>
					</TR>
					<TR>
						<TD COLSPAN=3>
							<TABLE WIDTH=100% CELLPADDING=0 CELLSPACING=0>
								<TR VALIGN=TOP>
									<TD WIDTH=50%>
										<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH=100%>
											<TR>
												<TD CLASS=border>
													<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH=100%>
														<TR ALIGN=CENTER>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                                                                                                        This is the heading for the player score chart
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
															<TD CLASS=thin BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Player</SPAN></TD>
															<TD CLASS=thin BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Consumed<BR>Polyp Files</SPAN></TD>
															<TD CLASS=thin BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Shrimp<BR>Eaten</SPAN></TD>
															<TD CLASS=thin BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Initial larva cubes</SPAN></TD>
														</TR>
														
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                        This shows player 1 and his scores all the way up to how many initial larva cubes
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                                                                                                
														<TR ALIGN=CENTER VALIGN=TOP BGCOLOR=#FFFF70>
															<TD CLASS=thin ALIGN=LEFT>
																<TABLE CELLSPACING=0 CELLPADDING=0>
																	<TR>
																		<TD><IMG SRC="images/P.gif" WIDTH=16 HEIGHT=16 ALT="P" ALIGN=ABSMIDDLE>&nbsp;</TD>
																		<TD>Player1</TD>
																	</TR>
																</TABLE>
															</TD>
															<TD CLASS=thin>&nbsp;</TD>
															<TD CLASS=thin>&mdash;</TD>
															<TD CLASS=thin>
																<TABLE CELLSPACING=0 CELLPADDING=0>
																	<TR>
																		<TD>1x</TD>
																		<TD><IMG BORDER=1 SRC=game/reef/images/l0.gif ALT=[w] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>
																		<TD>&nbsp;</TD>
																		<TD>1x</TD>
																		<TD><IMG BORDER=1 SRC=game/reef/images/l2.gif ALT=[o] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>
																		<TD>&nbsp;</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
														
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                This shows player 2 and his scores all the way up to how many initial larva cubes
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
														<TR ALIGN=CENTER VALIGN=TOP >
															<TD CLASS=thin ALIGN=LEFT>
																<TABLE CELLSPACING=0 CELLPADDING=0>
																	<TR>
																		<TD><IMG SRC="images/G.gif" WIDTH=16 HEIGHT=16 ALT="G" ALIGN=ABSMIDDLE>&nbsp;</TD>
																		<TD>Player2</TD>
																	</TR>
																</TABLE>
															</TD>
															<TD CLASS=thin>&nbsp;</TD>
															<TD CLASS=thin>&mdash;</TD>
															<TD CLASS=thin>
																<TABLE CELLSPACING=0 CELLPADDING=0>
																	<TR>
																		<TD>2x</TD>
																		<TD><IMG BORDER=1 SRC=game/reef/images/l0.gif ALT=[w] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>
																		<TD>&nbsp;</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
													</TABLE>
												</TD>
											</TR>
										</TABLE>
										<BR>
									</TD>
									
									<TD WIDTH=10></TD>
									<TD>
										<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
											<TR>
												<TD CLASS=border>
													<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">
														<TR ALIGN=CENTER>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                This is the heading that contains Behind your screen
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
															<TD CLASS=border BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Behind Your Screen</SPAN></TD>
														</TR>
														
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                This is where the number of the players polyp tiles are shown
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
														<TR>
															<TD CLASS=border>
																<TABLE>
																	<TR>
																		<TD ALIGN=RIGHT>Polyp Files:</TD>
																		<TD></TD>
																		<TD></TD>
																		<TD>
																			<TABLE CELLSPACING=0 CELLPADDING=0>
																				<TR>
																					<TD>4x</TD>
																					<TD><IMG BORDER=1 SRC=game/reef/images/p1.jpg ALT=[y] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>
																				</TR>
																			</TABLE>
																		</TD>
																		<TD>
																			<TABLE CELLSPACING=0 CELLPADDING=0>
																				<TR>
																					<TD>1x</TD>
																					<TD><IMG BORDER=1 SRC=game/reef/images/p2.jpg ALT=[o] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>
																				</TR>
																			</TABLE>
																		</TD>
																	</TR>
																	
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                    This is where the number of the players larva cubes are shown
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
																	<TR>
																		<TD ALIGN=RIGHT>Larva Cubes:</TD>
																		<TD></TD>
																		<TD>
																			<TABLE CELLSPACING=0 CELLPADDING=0>
																				<TR>
																					<TD>1x</TD>
																					<TD><IMG BORDER=1 SRC=game/reef/images/l0.gif ALT=[w] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>
																				</TR>
																			</TABLE>
																		</TD>
																		<TD></TD>
																		<TD>
																			<TABLE CELLSPACING=0 CELLPADDING=0>
																				<TR>
																					<TD>1x</TD>
																					<TD><IMG BORDER=1 SRC=game/reef/images/l2.gif ALT=[o] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>
																				</TR>
																			</TABLE>
																		</TD>
																	</TR>
																	
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                    This shows how many shrimp the player still has (that are not eaten)
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                                                                                                                <TR>
																	<TR>
																		<TD ALIGN=RIGHT>Shrimp:</TD>
																		<TD></TD>
																		<TD COLSPAN=15><IMG SRC="game/reef/images/sP.gif"><IMG SRC="game/reef/images/sP.gif"><IMG SRC="game/reef/images/sP.gif"><IMG SRC="game/reef/images/sP.gif"></TD>
																	</TR>
																	
																</TABLE>
															</TD>
														</TR>
													</TABLE>
												</TD>
											</TR>
										</TABLE>
										<BR>
									</TD>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                        This shows what is inside the players parrotfish
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->                                                                    <TD WIDTH=10></TD>
									<TD WIDTH=10></TD>
									<TD>
										<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
											<TR>
												<TD CLASS=border>
													<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">
														<TR ALIGN=CENTER>
															<TD CLASS=border BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>In Your Parrotfish</SPAN></TD>
														</TR>
														<TR>
															<TD CLASS=border>
																<TABLE WIDTH=100%>
																	<TR ALIGN=CENTER>
																		<TD>
																			<TABLE CELLSPACING=0 CELLPADDING=0>
																				<TR>
																					<TD>1x</TD>
																					<TD><IMG BORDER=1 SRC=game/reef/images/p2.jpg ALT=[o] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE></TD>
																					<TD>&nbsp;</TD>
																				</TR>
																			</TABLE>
																		</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
													</TABLE>
												</TD>
											</TR>
										</TABLE>
										<BR>
									</TD>
								</TR>
								
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                        This contains the heading Choose an Action and the entire Action list all the way until [start your turn over]
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->								<TR>
								<TR>
									<TD COLSPAN=5>
										<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
											<TR>
												<TD CLASS=borderred>
													<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">
														<TR ALIGN=CENTER>
															<TD CLASS=borderred BGCOLOR='#FF3333'><SPAN CLASS=yellow_text_bold>Choose an Action</SPAN></TD>
														</TR>
														<TR>
															<TD CLASS=borderred BGCOLOR="#FFFFBB">
																<TABLE WIDTH=100%>
																	<TR>
																		<TD><IMG SRC="game/reef/images/a1d.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT> <B>Action 1</B>:</B> Eat one coral and a shrimp with your parrotfish<BR>(once at start of turn only)</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
														<TR>
															<TD CLASS=borderred BGCOLOR="#FFFFBB">
																<TABLE WIDTH=100%>
																	<TR>
																		<TD WIDTH=50%><IMG SRC="game/reef/images/a2.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT BORDER=0> <B>Action 2:</B></A></B> Play a larva cube and polyp tiles<BR>(only once per turn)</TD>
																		<TD WIDTH=50%><IMG SRC="game/reef/images/a6d.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT> <B>Action 6</B>:</B> Exchange a consumed polyp tile for a larva cube of the same colour (larva cube must be played immediately)</TD>
																	</TR>
																	<TR>
																		<TD WIDTH=50%><IMG SRC="game/reef/images/a3d.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT> <B>Action 3</B>:</B> Play a second larva cube and polyp tiles<BR>(only once per turn)</TD>
																		<TD WIDTH=50%><IMG SRC="game/reef/images/a7d.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT> <B>Action 7</B>:</B> Acquire and play an alga cylinder</TD>
																	</TR>
																	<TR>
																		<TD WIDTH=50%><A HREF="hw7db.php?act=shrimplocs&r=0"><IMG SRC="game/reef/images/a4.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT BORDER=0> <B>Action 4:</B></A></B> Introduce a shrimp<BR>(only once per turn)</TD>
																		<TD WIDTH=50%><IMG SRC="game/reef/images/a8.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT BORDER=0> <B>Action 8:</B></A></B> Exchange a larva cube for a polyp tile of the same colour</TD>
																	</TR>
																	<TR>
																		<TD WIDTH=50%><IMG SRC="game/reef/images/a5d.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT> <B>Action 5</B>:</B> Move or remove a shrimp</TD>
																		<TD WIDTH=50%><IMG SRC="game/reef/images/a9d.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT> <B>Action 9</B>:</B> Do none of the above</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
														<TR>
															<TD CLASS=borderred BGCOLOR="#FFFFBB">
																<TABLE WIDTH=100%>
																	<TR>
																		<TD><IMG SRC="game/reef/images/a10.jpg" WIDTH="50" HEIGHT="32" ALIGN=LEFT BORDER=0> <B>Action 10:</B></A></B> Collect a larva cube and polyp tiles from the open sea<BR>(must do once, at end of turn only)</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
														<TR>
															<TD CLASS=borderred BGCOLOR="#FFFFBB">
																<P><A HREF="hw7db.php?act=reset&p=1">[Start your turn over]</A></P>
															</TD>
														</TR>
													</TABLE>
												</TD>
											</TR>
										</TABLE>
										<BR>
									</TD>
								</TR>
								
								
								<TR VALIGN=TOP>
									<TD COLSPAN=5>
										<TABLE CELLSPACING=0 CELLPADDING=0 WIDTH="100%">
											<TR>
												<TD CLASS=border>
													<TABLE CELLSPACING=0 CELLPADDING=3 WIDTH="100%">
														<TR ALIGN=CENTER>
															<TD CLASS=border BGCOLOR='#0066CC'><SPAN CLASS=yellow_text_bold>Game Board</SPAN></TD>
														</TR>
														<TR>
															<TD CLASS=border>
																<TABLE CELLPADDING=0 CELLSPACING=0 WIDTH="100%">
																	<TR>
																		<TD ALIGN=CENTER>
																			<TABLE CELLPADDING=0 CELLSPACING=2>
																				<TR ALIGN=CENTER VALIGN=BOTTOM>
																					<TD>
																						&nbsp;<BR>
																						
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                                                                These are the numbered squares that show which coral has control over others
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct00.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>1</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct10.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>2</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct20.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>3</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct30.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>4</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct40.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>5</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p2.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct50.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>6</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct60.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>7</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p3.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct70.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>8</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct80.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p0.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>9</B>
																					</TD>
																					<TD>
																						&nbsp;<BR>
																						<TABLE CELLPADDING=0 CELLSPACING=0 STYLE="border: solid 1px black;">
																							<TR>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p4.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																							<TR>
																								<TD><IMG SRC="game/reef/images/ct90.gif" WIDTH=32 HEIGHT=32></TD>
																								<TD><IMG SRC="game/reef/images/p1.jpg" WIDTH=32 HEIGHT=32></TD>
																							</TR>
																						</TABLE>
																						<B>10</B>
																					</TD>
																				</TR>
																			</TABLE>
																			
																			<P>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                                        This shows the larva cube and polyp tiles you collect when Action 10 is executed
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->																			<TABLE CELLPADDING=2 CELLSPACING=2 BORDER=0>
																			<TABLE CELLPADDING=2 CELLSPACING=2 BORDER=0>
																				<TR ALIGN=CENTER VALIGN=TOP>
																					<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">
																						<TABLE CELLSPACING=2 CELLPADDING=0>
																							<TR ALIGN=CENTER>
																								<TD><IMG BORDER=1 SRC=game/reef/images/l0.gif ALT=[w] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+6 in supply</TD>
																							</TR>
																							<TR>
																								<TD></TD>
																							</TR>
																							<TR ALIGN=CENTER>
																								<TD><IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g"></TD>
																							</TR>
																						</TABLE>
																					</TD>
																					<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">
																						<TABLE CELLSPACING=2 CELLPADDING=0>
																							<TR ALIGN=CENTER>
																								<TD><IMG BORDER=1 SRC=game/reef/images/l1.gif ALT=[y] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+9 in supply</TD>
																							</TR>
																							<TR>
																								<TD></TD>
																							</TR>
																							<TR ALIGN=CENTER>
																								<TD><IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p1.jpg" HEIGHT=32 WIDTH=32 ALT="y"></TD>
																							</TR>
																						</TABLE>
																					</TD>
																					<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">
																						<TABLE CELLSPACING=2 CELLPADDING=0>
																							<TR ALIGN=CENTER>
																								<TD><IMG BORDER=1 SRC=game/reef/images/l2.gif ALT=[o] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+8 in supply</TD>
																							</TR>
																							<TR>
																								<TD></TD>
																							</TR>
																							<TR ALIGN=CENTER>
																								<TD><IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p0.jpg" HEIGHT=32 WIDTH=32 ALT="w"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p2.jpg" HEIGHT=32 WIDTH=32 ALT="o"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p0.jpg" HEIGHT=32 WIDTH=32 ALT="w"></TD>
																							</TR>
																						</TABLE>
																					</TD>
																					<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">
																						<TABLE CELLSPACING=2 CELLPADDING=0>
																							<TR ALIGN=CENTER>
																								<TD><IMG BORDER=1 SRC=game/reef/images/l3.gif ALT=[p] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+9 in supply</TD>
																							</TR>
																							<TR>
																								<TD></TD>
																							</TR>
																							<TR ALIGN=CENTER>
																								<TD><IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p0.jpg" HEIGHT=32 WIDTH=32 ALT="w"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p2.jpg" HEIGHT=32 WIDTH=32 ALT="o"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p3.jpg" HEIGHT=32 WIDTH=32 ALT="p"></TD>
																							</TR>
																						</TABLE>
																					</TD>
																					<TD WIDTH=115 BGCOLOR=#6DC0B4 STYLE="border: solid 1px black;">
																						<TABLE CELLSPACING=2 CELLPADDING=0>
																							<TR ALIGN=CENTER>
																								<TD><IMG BORDER=1 SRC=game/reef/images/l4.gif ALT=[g] WIDTH=16 HEIGHT=16 ALIGN=ABSMIDDLE><BR>+9 in supply</TD>
																							</TR>
																							<TR>
																								<TD></TD>
																							</TR>
																							<TR ALIGN=CENTER>
																								<TD><IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g"> <IMG STYLE="border: solid 1px #4F4F4F;" SRC="game/reef/images/p4.jpg" HEIGHT=32 WIDTH=32 ALT="g"></TD>
																							</TR>
																						</TABLE>
																					</TD>
																					<TD></TD>
																					<TD WIDTH=110 VALIGN=TOP STYLE="border: solid 1px black; font-size: 11px; font-weight: bold; padding-top: 6px;">Alga Cylinder Space<BR><BR><BR>none</TD>
																				</TR>
																			</TABLE>
																			
																			<P>
																			
																			<TABLE CELLPADDING=0 CELLSPACING=5>
																				<TR VALIGN=TOP>
																					<TD>
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                                                                This gives you the row and column heading for the left gameboard and also the first 
																						corals that start on the board as well as the gameboard its self
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->																						<DIV STYLE="left:0px; top:0px; width:340; height:291; position:relative; border: solid 1px black;"><SPAN ID="map" STYLE="left:0; top:0; position:absolute; z-index:100;"><IMG SRC="game/reef/images/b0.jpg" ></SPAN>
																						<DIV STYLE="left:0px; top:0px; width:340; height:291; position:relative; border: solid 1px black;"><SPAN ID="map" STYLE="left:0; top:0; position:absolute; z-index:100;"><IMG SRC="game/reef/images/b0.jpg" ></SPAN>
																							<?php
                                                                                                                                                                                        // get URL r = 0 to show player clicked action 4
                                                                                                                                                                                        $r = (isset($_GET['r'])) ? filter_input(INPUT_GET, 'r'): 1;
                                                                                                                                                                                        $prompt = ($r == 0)? true: false;   // check to see if current pass is action 4 or not
                                                                                                                                                                                        
                                                                                                                                                                                        include_once 'action4.php';         // include action 4 file
                                                                                                                                                                                        include_once 'shrimpBrdOne.php';    // include file with shrimp1 php implementation        
                                                                                                                                                                                        showBoard($rf0);
                                                                                                                                                                                        showShrimp1($prompt);
                                                                                                                                                                                        
																							?>
																							<SPAN STYLE="left:44; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">A</SPAN>
																							<SPAN STYLE="left:84; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">B</SPAN>
																							<SPAN STYLE="left:124; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">C</SPAN>
																							<SPAN STYLE="left:164; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">D</SPAN>
																							<SPAN STYLE="left:204; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">E</SPAN>
																							<SPAN STYLE="left:244; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">F</SPAN>
																							<SPAN STYLE="left:284; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">G</SPAN>
																							
																							<SPAN STYLE="left:0; top:39; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">1</SPAN>
																							<SPAN STYLE="left:0; top:79; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">2</SPAN>
																							<SPAN STYLE="left:0; top:119; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">3</SPAN>
																							<SPAN STYLE="left:0; top:159; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">4</SPAN>
																							<SPAN STYLE="left:0; top:199; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">5</SPAN>
																							<SPAN STYLE="left:0; top:239; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">6</SPAN>
                                                                                                                                                                                        <?php
                                                                                                                                                                                            if($prompt == true){    // if action 4 was just pressed
                                                                                                                                                                                                placeTarget0();     // run action 4 command for markers on board
                                                                                                                                                                                            }
                                                                                                                                                                                        ?>
                                                                                                                                                                                </DIV>
																					</TD>
																					
<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------														
                                                                                                                                                                        This gives you the row and column heading for the right gameboard and also the first 
                                                                                                                                                                        corals that start on the board as well as the gameboard its self
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
																					<TD>
																						<DIV STYLE="left:0px; top:0px; width:340; height:291; position:relative; border: solid 1px black;"><SPAN ID="map" STYLE="left:0; top:0; position:absolute; z-index:100;"><IMG SRC="game/reef/images/b3.jpg" ></SPAN>
                                                                                                                                                                                        <?php
                                                                                                                                                                                        include_once 'shrimpBrdTwo.php'; // include file with php declarations
                                                                                                                                                                                        showBoard($rf3);
                                                                                                                                                                                        showShrimp2($prompt);
                                                                                                                                                                                        
                                                                                                                                                                                        ?>
																							<SPAN STYLE="left:44; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">H</SPAN>
																							<SPAN STYLE="left:84; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">I</SPAN>
																							<SPAN STYLE="left:124; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">J</SPAN>
																							<SPAN STYLE="left:164; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">K</SPAN>
																							<SPAN STYLE="left:204; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">L</SPAN>
																							<SPAN STYLE="left:244; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">M</SPAN>
																							<SPAN STYLE="left:284; top:4; width:0px; height: 0px; position:absolute; z-index:200; font-weight: bold; font-size: 12px;">N</SPAN>
																							<SPAN STYLE="left:320; top:39; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">1</SPAN>
																							<SPAN STYLE="left:320; top:79; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">2</SPAN>
																							<SPAN STYLE="left:320; top:119; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">3</SPAN>
																							<SPAN STYLE="left:320; top:159; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">4</SPAN>
																							<SPAN STYLE="left:320; top:199; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">5</SPAN>
																							<SPAN STYLE="left:320; top:239; width:18px; position:absolute; z-index:200; font-weight: bold; font-size: 12px; text-align: center;">6</SPAN>
                                                                                                                                                                                        <?php
                                                                                                                                                                                            if($prompt == true){    // if action 4 was just pressed
                                                                                                                                                                                                placeTarget1();     // run action 4 command for markers on board
                                                                                                                                                                                                
                                                                                                                                                                                            }
                                                                                                                                                                                        ?>
                                                                                                                                                                                </DIV>
																					</TD>
																				</TR>
																			</TABLE>
																		</TD>
																	</TR>
																</TABLE>
															</TD>
														</TR>
													</TABLE>
												</TD>
											</TR>
										</TABLE>
									</TD>
								</TR>
							</TABLE>
						</TD>
					</TR>
				</TABLE>
				<BR>
			</TD>
		</TR>
	</TABLE>
	</DIV>
	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
		var pageTracker = _gat._getTracker("UA-3991266-1");
		pageTracker._initData();
		pageTracker._trackPageview();
	</script>
</BODY>
</HTML>

