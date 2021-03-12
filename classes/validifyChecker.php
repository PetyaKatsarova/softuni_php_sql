<?php
// Problem 03. Validity Checker
// Write a program that receives two points in the format x1, y1, x2, y2 and checks if the distances between each point and the start of the cartesian coordinate system (0, 0) and between the points themselves is valid. A distance between two points is considered valid, if it is an integer value. In case a distance is valid write &quot;{x1, y1} to {x2, y2}is valid&quot;, in case the distance is invalid write &quot;{x1, y1} to {x2, y2} is invalid&quot;.The order of comparisons should always be first {x1, y1} to {0, 0}, then {x2, y2} to {0, 0} and finally {x1, y1} to {x2,
// y2} The input consists of one string in which the coordinates are separated by “, “(look at the examples).For each comparison print on the output either &quot;{x1, y1} to {x2, y2} is valid&quot; if the distance between them is valid,or &quot;{x1, y1} to {x2, y2} is invalid&quot;- if it’s invalid.
// Examples
// Input Output
// 3, 0, 0, 4 {3, 0} to {0, 0} is valid
// {0, 4} to {0, 0} is valid
// {3, 0} to {0, 4} is valid
// 2, 1, 1, 1 {2, 1} to {0, 0} is invalid
// {1, 1} to {0, 0} is invalid
// {2, 1} to {1, 1} is valid