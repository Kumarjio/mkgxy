function PGN(g) {
    if (!$("#" + g)) {
        return false
    }
    var e = g;
    var h = "_pgn_";

    function f(p) {
        for (var q = 0; q < p.length; q++) {
            if (p[q] == "false") {
                p[q] = false
            }
        }
        return p
    }

    function i() {
        var q = $("#" + e + h + "pgn").val();
        var p = o(q);
        if (p) {
            objMainboard.LoadGame(p)
        } else {
            alert("PGN is not valid")
        }
    }
    this.Create = function() {
        var p = "";
        p = p + '<div class="pgn_panel">';
        p = p + "<fieldset><legend>PGN</legend>";
        p = p + '<textarea id="' + e + h + 'pgn" class="mpgn"></textarea>';
        p = p + '<button id="' + e + h + 'load">Load</button>';
        p = p + "</fieldset>";
        p = p + "</div>";
        $("#" + e).append(p);
        $("#" + e + h + "load").live("click", function() {
            i()
        })
    };
    this.loadPgn = function(q) {
      var p = o(q);
      return p;
    }

    function n(u, v, s, r, t) {
        var w = v + r;
        var p = "PNBRQK";
        var q = "pnbrqk";
        if ((u[v] == "P" || u[v] == "p") && Math.abs(r) == 8) {
            var x = " "
        } else {
            if ((u[v] == "P" || u[v] == "p") && Math.abs(r) != 8) {
                var x = (p.indexOf(u[v]) != -1) ? q : p
            } else {
                var x = " " + ((p.indexOf(u[v]) != -1) ? q : p)
            }
        }
        if (w >= 0 && w <= 63 && Math.abs(v % 8 - w % 8) <= 2 && x.indexOf(u[w]) != -1) {
            if (w == s) {
                return true
            } else {
                if (t > 1) {
                    u = u.slice(0, w) + u[v] + u.substr(w + 1);
                    return n(u, w, s, r, --t)
                } else {
                    return false
                }
            }
        } else {
            return false
        }
    }

    function o(r) {
        r = r.replace(/0-0-0/g, "O-O-O");
        r = r.replace(/0-0/g, "O-O");
        var u = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
        var s = "";
        var t = "rnbqkbnrpppppppp                                PPPPPPPPRNBQKBNR";
        var p = new Array(u);
        var w = new Array("");
        var v = new Array("null");
        var x = l(r);
        for (var q = 0; q < x.length; q++) {
            ply = x[q];
            target = ply.replace(/^.*([a-h]{1}[1-8]{1}).*?$/g, "$1");
            targetindex = c(target);
            source = ply.replace(/^([PRBNQK]{1})?([a-h]{1})?([1-8]{1})?(x)?[a-h]{1}[1-8]{1}.*?$/g, "$2$3");
            if (source == ply) {
                source = ""
            }
            promotion = ply.replace(/^.*=([RBNQK]{1}).*$/g, "$1");
            if (promotion == ply) {
                promotion = ""
            }
            piece = ply.replace(/[^=]*([PRBNQK]{1}).*/g, "$1");
            if (piece == ply) {
                piece = "P"
            }
            if (q % 2 != 0) {
                piece = piece.toLowerCase();
                promotion = promotion.toLowerCase()
            }
            pattern = new RegExp(piece, "g");
            switch (ply) {
                case "0-0-0":
                case "O-O-O":
                    t = (q % 2 != 0) ? "  kr " + t.substr(5) : t.slice(0, 56) + "  KR " + t.substr(61);
                    sourceindex = true;
                    sourcecandidate = (q % 2 != 0) ? c("e8") : c("e1");
                    targetindex = (q % 2 != 0) ? c("c8") : c("c1");
                    break;
                case "0-0":
                case "O-O":
                    t = (q % 2 != 0) ? t.slice(0, 4) + " rk " + t.substr(8) : t.slice(0, 60) + " RK ";
                    sourceindex = true;
                    sourcecandidate = (q % 2 != 0) ? c("e8") : c("e1");
                    targetindex = (q % 2 != 0) ? c("g8") : c("g1");
                    break;
                default:
                    sourceindex = false;
                    while (pattern.test(t) == true && !sourceindex) {
                        sourcecandidate = pattern.lastIndex - 1;
                        switch (piece) {
                            case "P":
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -8, 2);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -9, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -7, 1);
                                break;
                            case "p":
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 8, 2);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 9, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 7, 1);
                                break;
                            case "N":
                            case "n":
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -17, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -15, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -10, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -6, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 6, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 10, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 15, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 17, 1);
                                break;
                            case "B":
                            case "b":
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -9, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -7, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 7, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 9, 8);
                                break;
                            case "R":
                            case "r":
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -8, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -1, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 1, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 8, 8);
                                break;
                            case "Q":
                            case "q":
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -9, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -7, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 7, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 9, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -8, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -1, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 1, 8);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 8, 8);
                                break;
                            case "K":
                            case "k":
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -9, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -7, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 7, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 9, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -8, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, -1, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 1, 1);
                                sourceindex = sourceindex || n(t, sourcecandidate, targetindex, 8, 1);
                                break
                        }
                        if (sourceindex && (source == "" || d(sourcecandidate).indexOf(source) != -1)) {
                            if (piece == "P" && t[targetindex] == " " && source != "") {
                                t = t.slice(0, targetindex + 8) + " " + t.substr(targetindex + 9)
                            }
                            if (piece == "p" && t[targetindex] == " " && source != "") {
                                t = t.slice(0, targetindex - 8) + " " + t.substr(targetindex - 9)
                            }
                            t = t.slice(0, sourcecandidate) + " " + t.substr(sourcecandidate + 1);
                            t = t.slice(0, targetindex) + ((promotion == "") ? piece : promotion) + t.substr(targetindex + 1)
                        } else {
                            sourceindex = false
                        }
                    }
                    break
            }
            if (sourceindex) {
                nextmove = d(sourcecandidate) + d(targetindex) + promotion.toUpperCase();
                strMove = objMainboard.ConvertNotation(u, nextmove);
                u = objMainboard.GetNewFen(u, nextmove);
                if (u) {
                    v.push(strMove);
                    p.push(u);
                    moveindex = (q % 2 == 0) ? (Math.floor(q / 2) + 1) + ". " : " ";
                    s = s + ' <span id="mainboard_chessboard_movelist_' + (q + 1) + '" class="mainboard_chessboard_halfmove chessboard_halfmove">' + moveindex + strMove + "</span>";
                    w.push(s)
                }
            }
        }
        $('#tmp').html(q);
        if (p.length > 1) {
            return "frompgn|0|" + p.join(";") + "|" + v.join(";") + "|" + w.join(";")
        } else {
            return false
        }
    }

    function l(s) {
        s = s.replace(/\{[^\{\}]*\}/g, " ");
        s = s.replace(/\([^\(\)]*\)/g, " ");
        s = s.replace(/\<[^<>]*>/g, " ");
        s = s.replace(/\[[^\[\]]*]/g, " ");
        s = s.replace(/[\n\r+]+/g, " ");
        s = s.replace(/[\s]{2,}/g, " ");
        var r = new Array();
        var p = 0;
        var q = /([0-9]+[. ]+)?(([BNRQK]{1})?([a-h])?([1-8])?(x)?([a-h][1-8])(=[BNRQ]{1})?|(0-0-0)|(0-0-0)|(O-O-O)|(O-O))([^ ]*)/g;
        while (q.test(s) == true) {
            r.push(s.substring(p, q.lastIndex).replace(/^[0-9 .]+/g, ""));
            p = q.lastIndex
        }
        return r
    }

    function c(r) {
        var q = new Array();
        q["1"] = 0;
        q["2"] = 1;
        q["3"] = 2;
        q["4"] = 3;
        q["5"] = 4;
        q["6"] = 5;
        q["7"] = 6;
        q["8"] = 7;
        var p = new Array();
        p.a = 0;
        p.b = 1;
        p.c = 2;
        p.d = 3;
        p.e = 4;
        p.f = 5;
        p.g = 6;
        p.h = 7;
        return (7 - q[r[1]]) * 8 + p[r[0]]
    }

    function d(p) {
        var r = new Array("8", "7", "6", "5", "4", "3", "2", "1");
        var q = new Array("a", "b", "c", "d", "e", "f", "g", "h");
        return q[p % 8] + r[Math.floor(p / 8)]
    }
    var b = new Array();
    b.P = "&#9817;";
    b.R = "&#9814;";
    b.N = "&#9816;";
    b.B = "&#9815;";
    b.K = "&#9812;";
    b.Q = "&#9813;";
    b.p = "&#9823;";
    b.r = "&#9820;";
    b.n = "&#9822;";
    b.b = "&#9821;";
    b.k = "&#9818;";
    b.q = "&#9819;";
    b[" "] = "";
    var a = new Array();
    var j = new Array();
    var k = new Array();
    var m = new Array()
};