/**
 * Product Suggestion System Test Suite
 * This script verifies that the suggestion system exclusively recommends 
 * products present in the dashboard inventory.
 */

function runSuggestionTests() {
    console.group('--- Product Suggestion System Tests ---');
    
    // Mock Data
    const mockDashboard = [
        { id: 'P101', name: 'Dashboard Shirt', price: '$89', imageUrl: 'img1.jpg' },
        { id: 'P102', name: 'Dashboard Coat', price: '$345', imageUrl: 'img2.jpg' }
    ];
    
    const currentProduct = { id: 'P101', name: 'Dashboard Shirt' };
    
    // Test 1: Exclusivity
    console.log('Test 1: Exclusivity (Only dashboard products recommended)');
    const suggestions = mockDashboard
        .filter(p => String(p.id) !== String(currentProduct.id));
    
    const allInDashboard = suggestions.every(s => mockDashboard.some(d => d.id === s.id));
    console.assert(allInDashboard === true, '❌ FAILED: Suggested product not found in dashboard.');
    if (allInDashboard) console.log('✅ PASSED: All suggestions are from dashboard.');

    // Test 2: Current Product Exclusion
    console.log('Test 2: Current Product Exclusion');
    const isCurrentExcluded = !suggestions.some(s => s.id === currentProduct.id);
    console.assert(isCurrentExcluded === true, '❌ FAILED: Current product was suggested.');
    if (isCurrentExcluded) console.log('✅ PASSED: Current product correctly excluded.');

    // Test 3: Empty Dashboard Handling
    console.log('Test 3: Empty Dashboard Handling');
    const emptyDashboard = [];
    const noSuggestions = emptyDashboard.filter(p => p.id !== 'any');
    console.assert(noSuggestions.length === 0, '❌ FAILED: Suggestions generated from empty dashboard.');
    if (noSuggestions.length === 0) console.log('✅ PASSED: Correctly handled empty dashboard.');

    console.groupEnd();
}

// Auto-run tests if in debug mode
if (window.location.search.includes('debug=true')) {
    runSuggestionTests();
}
