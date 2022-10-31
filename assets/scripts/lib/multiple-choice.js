export let convertToIndex = (alphabet) => {
    alphabet = alphabet.toLowerCase();

    switch (alphabet) {
        case 'a': return 0;
        case 'b': return 1;
        case 'c': return 2;
        case 'd': return 3;
        default: console.error("unknown args " + alphabet + " to convert it, use char a, b, c, and d."); break;
    }
}

export let convertToAlpha = (index) => {
    switch (index) {
        case 0: return 'a';
        case 1: return 'b';
        case 2: return 'c';
        case 3: return 'd';
        default: console.error("unknown args " + index + " to convert it, use integer 0 to 3."); break;
    }
}